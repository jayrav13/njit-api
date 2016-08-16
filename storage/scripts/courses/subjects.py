#
# subjects.py
#
# The purpose of this Python script is to return all of the subjects at NJIT, along with
# URL's to their courses page.
#

# Import Statements
import requests
from lxml import html
import sys
import json

# Variables
semesters = ['spring', 'summer', 'fall', 'winter']
url = 'http://njit.edu/registrar/schedules/courses/%s/index_list.html'

# Confirm that the client has provided two argument variables, the second
# of which is a valid semester. If it is not, exit.
if len(sys.argv) != 2 or sys.argv[1] not in semesters:
    sys.exit()

# Update request URL to use the argument.
url = url % sys.argv[1]

page = requests.get(url)

if page.status_code != 200:
    sys.exit()

tree = html.document_fromstring(page.text.encode('utf-8'))

def subjects_to_json(subject):
    output = {}
    output["acronym"] = subject.text_content().strip()
    output["webpage"] = subject.xpath('@href')[0]
    return output



# Iterate through every possible semester.
for subject in tree.xpath('//a'):
    print json.dumps(subjects_to_json(subject))
    



        
