#
# all_sports.py
#
# The purpose of this Python script is to print a list of all NJIT sports,
# along with assistive data about that sport to standard output.
# The output takes the form of tab deliminated rows.
#

# Import Statements
import requests
from lxml import html
import sys

# Variables
base_url = 'http://www.njithighlanders.com'

#
# The initial page that we tried to scrape is: http://njithighlanders.com/
# The navigation bar was a perfect data source - however it seems to be loaded asynchronously 
# and we could not identify the data source. However, the 404 page seems to have the 
# same data availeble at the bottom, loaded with the page. Thus, we're using this as the data source. 
#
headers= {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36'}
page = requests.get(base_url + '/404-1.aspx?url=/404.aspx', headers=headers)

# Force encode the page with utf-8. This issue came up with the events scraper, so is used
# as a failsafe.
tree = html.document_fromstring(page.text.encode('utf-8'))

# Iterate over all divs that have the specific class where the sport's name is stored.
for elem in tree.xpath('//div[@class="small-12 columns sport-name-link"]'):
        
    # The name of a sport is returned as an array with a single value, a string which
    # represents the name of the sport.
    name = elem.xpath('a/text()')

    # This list comprehension extracts the paths to links associated with the sport
    # we're currently iterating over in the outside loop. 
    following = [x.get('href') for x in elem.xpath('following::div[@class="small-12 columns"][1]/a[@class="sport-section-link"]')]
    
    # Extend the name array to include the additional data about the sport retrieved
    # through the list comprehension.
    name.extend(following)

    # Output the resulting array to standard output, separated by tabs.
    print ("\t").join(name)