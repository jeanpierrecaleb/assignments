from flask import Flask, render_template, request, flash, url_for, redirect
import sqlite3

app = Flask(__name__)
app.secret_key = '5314321'



@app.route('/')
def index():
    connect2 = sqlite3.connect('database.db')
    
    cursor2 = connect2.cursor()
    cursor2.row_factory = sqlite3.Row
    cursor2.execute('SELECT * FROM Students')  
    data = cursor2.fetchall()
    number_of_students = len(data)
    cursor2.execute('SELECT * FROM Assignments')
    getall_assignments = cursor2.fetchall()
    number_of_assignments = len(getall_assignments)
    cursor2.execute('SELECT * FROM score_assignment')
    getall_score_assignments = cursor2.fetchall()
    number_score_assignments = len(getall_score_assignments)
    cursor2.execute('SELECT * FROM week_attendance')
    getall_week_attendances = cursor2.fetchall()
    number_week_attendances = len(getall_week_attendances)
    return render_template("index.html", items=data, nbs=number_of_students, 
            nbas=number_of_assignments,nsa=number_score_assignments,nwa=number_week_attendances)
    


@app.route('/student-form')
def addstudentform():
    return render_template('add-student.html')




# Create a connection to the database (this will create the database file if it doesn't exist)
conn = sqlite3.connect('database.db')
# Create a cursor object to interact with the database
cursor = conn.cursor()
# Create the students table (replace this with your table creation SQL)
cursor.execute('''
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        attendance_average REAL NOT NULL,
        assignment_completion INTEGER NOT NULL,
        ranking INTEGER NOT NULL,
        cohort TEXT NOT NULL
    )
''')

# Create the Assignments table
cursor.execute('''
        CREATE TABLE IF NOT EXISTS assignments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            description TEXT,
            deadline DATE
    )
''')

# Create ScoreAssignment table
cursor.execute('''
    CREATE TABLE IF NOT EXISTS score_assignment (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        student_id INTEGER,
        assignment_id INTEGER,
        score REAL NOT NULL,
        FOREIGN KEY (student_id) REFERENCES students (id),
        FOREIGN KEY (assignment_id) REFERENCES assignments (id)
    )
''')

# Create the WeekAttendance table
cursor.execute('''
    CREATE TABLE IF NOT EXISTS week_attendance (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        student_id INTEGER,
        week_number INTEGER,
        score REAL NOT NULL,  -- Should be in percentage
        FOREIGN KEY (student_id) REFERENCES students (id)
    )
''')

# Commit the changes and close the connection
conn.commit()
conn.close()



@app.route('/add_student', methods=['POST'])
def add_student():
    if request.method == 'POST':
        # Retrieve form data
        name = request.form['name']
        email = request.form['email']
        cohort = request.form['cohort']
        attendance = 0 # par defaut a la creation - request.form['attendance']
        assignment = 0 # request.form['assignment']
        ranking = 0  # request.form['ranking']
        # Insert data into the database
        conn = sqlite3.connect('database.db')
        cursor = conn.cursor()
        cursor.execute('INSERT INTO students (name, email, attendance_average, assignment_completion, ranking, cohort) VALUES (?, ?, ?, ?, ?, ?)',
                       (name, email, attendance, assignment, ranking, cohort))
        conn.commit()
        conn.close()
        flash('Student added successfully, more information in the next table', 'success')
        return redirect(url_for('index'))

# Select all the students
def get_students():
    with sqlite3.connect('database.db') as conn:
        cursor = conn.cursor()
        cursor.row_factory = sqlite3.Row
        cursor.execute('SELECT id, name, cohort FROM students')
        students = cursor.fetchall()
    return students

#all the assignment
def get_assignments():
    with sqlite3.connect('database.db') as conn:
        cursor = conn.cursor()
        cursor.row_factory = sqlite3.Row
        cursor.execute('SELECT * FROM assignments')
        assignments = cursor.fetchall()
    return assignments


@app.route('/add_assignment', methods=['GET', 'POST'])
def add_assignment():
    if request.method == 'POST':
        title = request.form['title']
        description = request.form['description']
        conn = sqlite3.connect('database.db')
        cursor = conn.cursor()
        # Insert the assignment into the database
        cursor.execute('INSERT INTO assignments (title, description) VALUES (?, ?)', (title, description))
        # Commit the changes and close the connection
        conn.commit()
        conn.close()
        return redirect(url_for('assignment_list'))
    return render_template('add-assignment.html')

@app.route('/assignment/list')
def assignment_list():
    # Connect to the database
    conn = sqlite3.connect('database.db')    
    cursor = conn.cursor()
    cursor.row_factory = sqlite3.Row
    # Fetch assignments from the database (replace 'assignments' with your actual table name)
    cursor.execute('SELECT * FROM assignments')
    assignments = cursor.fetchall()
    # Close the database connection
    conn.close()
    return render_template('list-assignment.html', assignments=assignments)


@app.route('/add_score_assignment', methods=['GET', 'POST'])
def add_score_assignment():
    if request.method == 'POST':
        student_id = request.form['student_id']
        assignment_id = request.form['assignment_id']
        score = request.form['score']
        conn = sqlite3.connect('database.db')
        cursor = conn.cursor()
        # Insert the score assignment into the database
        cursor.execute('INSERT INTO score_assignment (student_id, assignment_id, score) VALUES (?, ?, ?)',
                       (student_id, assignment_id, score))
        # Commit the changes and close the connection
        conn.commit()
        conn.close()
        return redirect(url_for('score_assignment_list'))
    students = get_students()
    assignments = get_assignments()
    return render_template('add-score_assignment.html', assignments=assignments, students=students)


@app.route('/score_assignment/list')
def score_assignment_list():
    connection = sqlite3.connect('database.db')
    cursor = connection.cursor()
    cursor.row_factory = sqlite3.Row
    # Fetch all score assignments from the database
    # cursor.execute('SELECT * FROM score_assignment')
     # Fetch all score assignments from the database, joining with students and assignments tables
    cursor.execute('''
        SELECT score_assignment.*, students.name AS student_name, assignments.title AS assignment_title
        FROM score_assignment
        JOIN students ON score_assignment.student_id = students.id
        JOIN assignments ON score_assignment.assignment_id = assignments.id
    ''')
    score_assignments = cursor.fetchall()
    # Close the database connection
    connection.close()
    return render_template('list-score_assignment.html', score_assignments=score_assignments)


@app.route('/add_week_attendance', methods=['GET', 'POST'])
def add_week_attendance():
    if request.method == 'POST':
        student_id = request.form['student_id']
        week_number = request.form['week_number']
        score = request.form['score']
        conn = sqlite3.connect('database.db')
        cursor = conn.cursor()
        # Insert the week attendance into the database
        cursor.execute('INSERT INTO week_attendance (student_id, week_number, score) VALUES (?, ?, ?)',
                       (student_id, week_number, score))
        # Commit the changes and close the connection
        conn.commit()
        conn.close()
        return redirect(url_for('attendance_list'))
    students = get_students()
    return render_template('add-week_attendance.html', students=students)


@app.route('/attendance/list')
def attendance_list():
    # Connect to the database
    conn = sqlite3.connect('database.db')
    
    cursor = conn.cursor()
    cursor.row_factory = sqlite3.Row
    # Fetch attendance from the database (replace 'assignments' with your actual table name)
    #cursor.execute('SELECT * FROM week_attendance')
    cursor.execute('''
    SELECT week_attendance.*, students.name AS student_name, students.cohort as student_cohort
    FROM week_attendance
    JOIN students ON week_attendance.student_id = students.id
        ''')
    attendances = cursor.fetchall()
    # Close the database connection
    conn.close()
    return render_template('list-attendance.html', attendances=attendances)


def reset_database():
    try:
        # Connect to the database
        connection = sqlite3.connect('database.db')
        cursor = connection.cursor()

        # Delete all data from the tables
        cursor.execute('DELETE FROM students')
        cursor.execute('DELETE FROM assignments')
        cursor.execute('DELETE FROM score_assignment')
        cursor.execute('DELETE FROM week_attendance')

        # Commit the changes
        connection.commit()

        print("Database reset successful.")

    except sqlite3.Error as error:
        print("Error resetting the database:", error)

    finally:
        if connection:
            connection.close()



if __name__ == '__main__':
    app.run(debug=True)
    #reset_database()

