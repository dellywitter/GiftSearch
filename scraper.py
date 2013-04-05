from urllib.request import urlopen
from html.parser import HTMLParser

response = urllib2.urlopen('http://www.findbrowsenodes.com/uk')
html = response.read()



# create a subclass and override the handler methods
class MyHTMLParser(HTMLParser):
	def __init__(self):
		self.cats=[]
	
	def handle_starttag(self, tag, attrs):
		print("Encountered a start tag:", tag)
	def handle_endtag(self, tag):
		print("Encountered an end tag :", tag)
	def handle_data(self, data):
		self.cats=str(data)
		print("Encountered some data  :", data)
        
        
parser = MyHTMLParser()
parser.feed(html)
print(parser.cats)