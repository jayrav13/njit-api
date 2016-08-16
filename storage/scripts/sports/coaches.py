#
# coaches.py
#
# The purpose of this Python script is to return the coaches of a given sport at NJIT.
#

# Import Statements
import requests
from lxml import html
import sys
import json

# Variables
base_url = 'http://www.njithighlanders.com'

# Check to confirm that a command line argument, specifically one command line argument,
# is provided.
if len(sys.argv) != 2:
    sys.exit()

# Return the second command line argumemt; the first is the file name.
# Sample URI segment that will be provided as an argument: /roster.aspx?path=baseball
uri = sys.argv[1]

# Make a GET request that corresponds with the URI segment provided.
page = requests.get(base_url + uri)

# In the event that a valid status code is not returned, exit the script immediately.
# This is specifically done so nothing is written out to standard output and the
# receiving PHP scheduled job does not break as a result.
if page.status_code != 200:
    sys.exit()

# Convert the HTML document into a DOM tree and force encode to UTF-8 to be safe.
tree = html.document_fromstring(page.text.encode('utf-8'))

# Return the tree element that corresponds with the table element for the roster.
table = tree.xpath('//table[@class="default_dgrd roster_coaches_dgrd"]')

# In the event that the above doesn't return an element, fail and exit out of script.
if table is None or len(table) == 0:
    sys.exit()

# The first row will be the header row. The coaches are in all rows following it.
coaches = table[0].xpath('tr')[1:]

#
# array_to_json
#
# Given an array of coaches data, populate and return an appropriate JSON object.
#
def array_to_json(data):
    output = {}
    output["image_url"] = data[0]
    output["name"] = data[1]
    output["title"] = data[2]
    return output

def coach_to_image(coach):
    image = coach.xpath('td/img/@src')

    if image:
        return image[0]
    else:
        return '-1'

# Iterate through all of the coaches and retrieve relevant data.
for coach in coaches:

    # Extract the table data's content.
    data = [x.text_content().strip() for x in coach.xpath('td')]

    # Extract the DOM where the image is expected to live, which is the second table data
    # value. In the event that no image is found, add default value.
    data[0] = coach_to_image(coach)

    print json.dumps(array_to_json(data))





