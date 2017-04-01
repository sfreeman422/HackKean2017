import wolframalpha(YGJTEJ-36E935EG6H)
client = wolframalpha.Client(
res = client.query('temperature in Washington, DC on October 3, 2012')

for pod in res.pods:
    do_something_with(pod)
    
for pod in res.pods:
    for sub in pod.subpods:
        print(sub.text)

print(next(res.results).text