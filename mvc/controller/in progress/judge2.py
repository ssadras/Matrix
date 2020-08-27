import MySQLdb

cnx = MySQLdb.connect(user='root', password='',
                              host='127.0.0.1',
                              database='codechallenger', port = 3308)
conn = cnx.cursor()
def f1():
    global conn
    report = ''
    while "Worng" not in report or "Time" not in report or "Accept" not in report:
        with open("result.txt", 'r') as f:
            report = f.readline()
            f.close()
        ID = 0 #in progress
        sql = "UPDATE users SET status='"+report+"' WHERE id="+str(ID);
        conn.execute(sql)
f1()
cnx.close()
