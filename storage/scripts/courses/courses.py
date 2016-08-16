#
# courses.py
#
# The purpose of this Python script is to return all of the courses at NJIT for a
# given subject given a semester.
#

# Import Statements
import requests
from lxml import html
import sys
import json

# Variables
url = 'http://www.njit.edu/registrar/schedules/courses/%s/%s'

# Confirm that the client has provided three argument variables, the second
# of which is a valid semester and the third of which is a valid webpage
# for scraping courses.
if len(sys.argv) != 3:
    sys.exit()

# Update request URL to use the argument.
url = url % (sys.argv[1], sys.argv[2])

page = requests.get(url)

if page.status_code != 200:
    sys.exit()

tree = html.document_fromstring(page.text.encode('utf-8'))

# Iterate through every possible subject.
for course in tree.xpath('//table'):

    # For each semester, iterate over every course
    for section in course.xpath('tr'):
        section = section.xpath('td')
        if section:
            print len(section)



                
