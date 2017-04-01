"""
Use this script to define methods, basicly acts like our base code.
We need to put the scripts in here so server.py and client.js can pull
"""
import wolframalpha
client = wolframalpha.Client("YGJTEJ-36E935EG6H")
item = input("What is the item: ")

x = 'sodium calorie'
item1, item2 = x.split(' ')

def nutrition(x):
    if x = 'calorie':
        question = 'How many calories in '
    elif x = 'carbohydrates':
        question = 'How many grams of carbohydrates in '
    elif x = 'sodium':
        question = 'How many grams of sodium in '
    elif x = 'calorie sodium':
        list = x.split()
        for word in list:
item1, item2 = x.split(' ')


    for i in range(len(list)):
        res = client.query(question + item)
        print(next(res.results).text)
