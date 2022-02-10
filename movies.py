import sqlite3

# conn = sqlite3.connect(':memory:')
conn = sqlite3.connect('movies.db')

# create a cursor
cur = conn.cursor()

#create a table
cur.execute("""CREATE TABLE bollymovies(
        movie_name text,
        actor_name text,
        actress_name text,
        release_year text,
        director_name
    )""")

#  insert multiple records into bollymovies table
many_records = [
    ('Robot', 'Rajnikant', 'Aishwarya', '2010', 'S.Shankar'),
     ('The Return of Abhimanyu', 'Vishal', 'Samantha', '2018', 'P.S.Mithran'),
     ('Meri Jung', 'Anil', 'Meenakshi', '1985', 'Subhash'),
]
cur.executemany("INSERT INTO bollymovies VALUES (?,?,?,?,?)", many_records)

# insert only one record into bollymovies table
cur.execute("INSERT INTO bollymovies VALUES ('Dayaalu', 'Nagarjuna', 'Samantha', '2014', 'Vikram')")

#  Update records into the bollymovies table 
# cur.execute("""UPDATE bollymovies SET release_year='1 October 2002'
#     WHERE rowid = 1
#     """)

# Delete record from the bollymovies table 
# cur.execute("DELETE from bollymovies WHERE rowid=4")

# Drop bollymovies table
# cur.execute("DROP TABLE bollymovies")

# Query The Database

cur.execute("SELECT rowid, * FROM bollymovies")

# print(cur.fetchone())
# print(cur.fetchmany(3))

# fetch and print all records of the table
items = cur.fetchall()
# print(items)

for item in items:
    print(item)

# commit our command
conn.commit()

# close our connection
conn.close()
