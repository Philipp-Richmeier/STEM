# import modules needed from datetime
from datetime import time # can use "as" to change the name
from datetime import date
from datetime import datetime
# this allows you to take only a single "book" from the "library"

# Create a main loops so this module can be imported
def main():
	
	# create a new date time object that holds the current datetime
	currentTime = datetime.now() #datetime is an object becuase of the "."
	print(type(currentTime))
	
	print(currentTime)
	
	# print only the time from the datetime object
	print(datetime.time(currentTime))
	
	# use strftime to print only the year from the datetime object
	print("Current Year: ",currentTime.strftime("%Y")) #strftime is stringfytime
	# % is str substitution
	
	# use strftime to print a very human readable date
	print("Current Date: ",currentTime.strftime("%a, %B %d, %Y"))
	
	

#if in the "name space" run "main"
if __name__ == "__main__":
	main()

