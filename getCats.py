import csv, os
class DataLoader(object):
	def __init__(self):
		self.cats=[]
	# open a text file
	# return a string 
	def openFile(self,file_name):
		f = open(file_name, 'r')
		try:
		    text = f.readlines()#text is a list of strings ending with \r\n tags
		finally:
			f.close()
		
		return text
	def show(self, text):
		cats=[]
		for line in text:
			print(line)
			l=line.split(' ')
			
			cats.append(l[1][:-1])
		f=open('realcats.txt', 'w') 
		for elem in cats:
			f.write(elem)
			f.write('\n')
		print(cats)

		
def main():
	p=DataLoader()
	text=p.openFile('cats.txt')	
	p.show(text)

if __name__=="__main__":
	main()