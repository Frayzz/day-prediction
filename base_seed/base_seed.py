import mysql.connector

bend = []
col = 7

path_to_file = "preds.txt"

with open(path_to_file, encoding="utf8") as file:
    for line in file:
        print(line)

        newArray = (col, line)
        bend.append(newArray)

        col += 1

print(bend)

  
myconn = mysql.connector.connect(
    host="localhost", user="root", passwd="", database="predicition")

cur = myconn.cursor() 
sql = "insert into predicitions(id, content) values(%s, %s)"

val = bend
 
try:
    cur.executemany(sql, val)

    myconn.commit()
    print(cur.rowcount, "records inserted!")

except:
    myconn.rollback()
 
print(cur.rowcount,"record inserted!") 
myconn.close() 

