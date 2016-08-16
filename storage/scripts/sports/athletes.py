#
# roster.py
#
# The purpose of this Python script is to return the roster of a given sport at NJIT.
# This includes details about each athlete, such as name, academic year, height, weight, etc.
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

# Declare an array fields to house the names of all of the table data classes from
# which we're going to scrape athlete data.
fields = [
    'roster_dgrd_no',
    'roster_dgrd_image_combined_path',
    'roster_dgrd_full_name',
    'roster_dgrd_academic_year',
    'roster_dgrd_height',
    'roster_dgrd_rp_weight',
    'roster_dgrd_rp_position_short',
    'roster_dgrd_hometownhighschool'
]

# Each of the above requires a default value in the event that a value is not found.
defaults = [
    -1,
    '',
    '',
    -1,
    '',
    -1,
    '',
    ''
]

#
# is_int
#
# A function that simply checks if an input is an integer or not.
#
def is_int(s):
    try: 
        int(s)
        return True
    except ValueError:
        return False

#
# convert_to_db_columns
#
# Given a JSON object, convert all of the keys to their equivalent keys in the
# API database.
#
def convert_to_db_columns(athlete):

    output = {}

    mapping = {
        'roster_dgrd_no': 'number',
        'roster_dgrd_image_combined_path': 'image_url',
        'roster_dgrd_full_name': 'name',
        'roster_dgrd_academic_year': 'year',
        'roster_dgrd_height': 'height',
        'roster_dgrd_rp_weight': 'weight',
        'roster_dgrd_rp_position_short': 'position',
        'roster_dgrd_hometownhighschool': 'hometown'
    }

    for key, value in athlete.iteritems():
        output[mapping[key]] = athlete[key]

    return output

# Convert the HTML document into a DOM tree and force encode to UTF-8 to be safe.
tree = html.document_fromstring(page.text.encode('utf-8'))

# Return the tree element that corresponds with the table element for the roster.
table = tree.xpath('//table[@class="default_dgrd roster_dgrd"]')

# In the event that the above doesn't return an element, fail and exit out of script.
if table is None or len(table) == 0:
    sys.exit()

# The first row will be the header row. The athletes are in all rows following it.
athletes = table[0].xpath('tr')[1:]

def intable(value):
    if value == '':
        return 0

    return value

# Iterate through all of the athletes and retrieve relevant data.
for athlete in athletes:

    # Extract all of the fields for this row using the fields table. This will check
    # for table data elements that match the expected field. In the event that the value
    # does not exist, replace with a default value.
    data = {}
    for index, field in enumerate(fields):
        element = athlete.xpath('td[@class="%s"]' % field)
        if len(element) == 1:
            data[field] = intable(element[0].text_content().strip())
        else:
            data[field] = defaults[index]

    # Extract the DOM where the image is expected to live, which is the second table data
    # value. In the event that no image is found, add default value.
    image = athlete[1].xpath('img/@src')
    if image:
        data['roster_dgrd_image_combined_path'] = image[0]
    else:
        data['roster_dgrd_image_combined_path'] = '-1'

    data = convert_to_db_columns(data)

    print json.dumps(data)





