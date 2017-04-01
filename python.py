import os  
import time
import sys
def print_menu()      
    print (30  - , Plan Selection , 30  -)
    print (1. Basic)
    print (2. Pro)
    print (3. Pro+)
    print (4. Upgraded)
    print (5. Exit Selection)
    print (67  -)  ]    
tup1 = ('Texas', 'New York', 'Japan', 'England'); #Server locations
tup2 = (100, 200, 3000, 4000, 50000, 600000, 7000000 ); #Server Sizes
loop = 1
while loop         
    print_menu()   
    choice = input(Enter your choice [1-5] )
     
    if choice=='1'    
        os.system('cls')       
        print (Your Server is located in , tup1[0])
        print (It can host , tup2[0], GB of data!)
        time.sleep(3)
        os.system('cls')
    elif choice=='2'
        os.system('cls')
        print (Your Server is located in , tup1[1])
        print (It can host , tup2[4], GB of data!)
        time.sleep(3)
        os.system('cls')
    elif choice=='3'
        os.system('cls')
        print (Your Server is located in , tup1[3])
        print (It can host , tup2[2], GB of data!)
        time.sleep(3)
        os.system('cls')
    elif choice=='4'
        os.system('cls')
        print (Your Server is located in , tup1[2])
        print (It can host , tup2[4], GB of data!)
        time.sleep(3)
        os.system('cls')
    elif choice=='5'
        os.system('cls')
        print (Goodbye)
        exit()
    else
        input(Wrong option selection. Enter any key to try again!)
        os.system('cls')