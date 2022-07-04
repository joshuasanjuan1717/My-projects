

class Students():
    def __init__(self, name, surname):
        self.firstName = name
        self.lastName = surname
    
#students = []

class Course():
    
    def __init__(self, code, subject):
        self.Code = code
        self.Subject = subject
        self.st = []
        self.duplicate = ""
        self.error = ""

    def __repr__(self):
        if self.error != "":
            print(self.error)
        if self.duplicate != "":
            print(self.duplicate)
        print(self.Code + ":" + self.Subject)
        #print("aaron sanjuan" not in self.st)
        print("students:")
        #print(self.st)
        for y in self.st:
            print(y)
        return str()


    def register(self, student):
        self.fname = student.firstName
        self.sname = student.lastName
        self.name = self.fname + " " + self.sname
        #students.append(self.fname + " " + self.sname)
        #return students
        if self.name not in self.st:
            self.st.append(self.name)
        else:
            self.duplicate = "duplicate "+self.name
        
        

    def unregister(self, student):
        self.fname = student.firstName
        self.sname = student.lastName
        self.name = self.fname + " " + self.sname
        
        if self.name not in self.st:
            self.error = "error " + self.name
            #print("Error")
        else:
            self.error = ""
            self.st.remove(self.name)
            
        #return students
        
        

        
    
        


















