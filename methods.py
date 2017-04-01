"""
Use this script to define methods, basicly acts like our base code.
We need to put the scripts in here so server.py and client.js can pull
"""
import wolframalpha
client = wolframalpha.Client("YGJTEJ-36E935EG6H")
item = input("What is the item: ")
question1 = "How many grams of sugar are in"
question2 = "How many grams of fat are in"
res1 = client.query(question1 + item)
res2 = client.query(question2 + item)
print(next(res1.results).text)
print(next(res2.results).text)
