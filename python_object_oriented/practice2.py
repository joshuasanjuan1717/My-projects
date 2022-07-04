from practice import Students, Course


p1 = Students("joshua","sanjuan")
p2 = Students("aaron","sanjuan")
p3 = Students("rhea","sanjuan")
p4 = Students("rhea","sanjuan")

course1 = Course("101", "math")
course1.register(p1)
course1.register(p2)
course1.register(p2)
#course1.register(p3)
course1.unregister(p3)
course2 = Course("102","science")
course2.register(p1)
course2.register(p3)
course2.register(p4)
course2.unregister(p1)
print(course1)
print(course2)
