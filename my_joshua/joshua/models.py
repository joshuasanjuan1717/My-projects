from django.db import models

# Create your models here.
class Items(models.Model):
    item = models.CharField(max_length=240)
    cost = models.CharField(max_length=240)
    class Meta:
        db_table = "my_items"

class Register(models.Model):
    username = models.CharField(max_length=240)
    password = models.CharField(max_length=240)
    class Meta:
        db_table = "user"