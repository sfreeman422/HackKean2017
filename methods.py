"""
Use this script to define methods, basicly acts like our base code.
We need to put the scripts in here so server.py and client.js can pull
"""
import wolframalpha
client = wolframalpha.Client("YGJTEJ-36E935EG6H")
item = input("What is the item: ")

question1 = "How many grams of sugar are in "
question2 = "How many grams of fat are in "
question3 = "How many grams of calories are in "
question4 = "How many grams of  are in "
question5 = "How many grams of sugar are in "
question6 = "How many grams of fat are in "

res1 = client.query(question1 + item)
res2 = client.query(question2 + item)
res3 = client.query(question1 + item)
res4 = client.query(question2 + item)
res5 = client.query(question1 + item)
res6 = client.query(question2 + item)

print(next(res1.results).text)
print(next(res2.results).text)
print(next(res3.results).text)
print(next(res4.results).text)
print(next(res5.results).text)
print(next(res6.results).text)
