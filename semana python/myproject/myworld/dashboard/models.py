from django.db import models

# Create your models here.
class Dashboard(models.Model):
    firtsname = models.CharField(max_length=255)
    lastname = models.CharField(max_length=255)