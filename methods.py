"""
Use this script to define methods, basicly acts like our base code.
We need to put the scripts in here so server.py and client.js can pull
"""
import wolframalpha
client = wolframalpha.Client("YGJTEJ-36E935EG6H")
item = raw_input("What is the item: ")
res = client.query('How many calories in ' + item)
print(next(res.results).text)
