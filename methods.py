"""
Use this script to define methods, basicly acts like our base code.
We need to put the scripts in here so server.py and client.js can pull
"""
import wolframalpha
import os
client = wolframalpha.Client("YGJTEJ-36E935EG6H")
a, b, c = input("List your items and divide them with (-): ").split('-')
items = [a, b, c];
os.system('cls') 
question1 = "How many grams of sugar are in "
question2 = "How many grams of fat are in "
question3 = "How many calories are in "


for item in items :
	res1 = client.query(question1 + item)
	res2 = client.query(question2 + item)
	res3 = client.query(question3 + item)
	print(item.upper())
	print("----------------------------")
	print("Grams of sugar:")
	print(next(res1.results).text)
	print("Grams of fat:")
	print(next(res2.results).text)
	print("Amount of calories:")
	print(next(res3.results).text)
	print("---------------------------")