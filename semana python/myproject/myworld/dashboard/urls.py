from django.urls import path
from . import views

urlpatterns = [
    path('',views.index, name='Dashboard'),
    path('add/',views.add, name='Agregar Usuario'),
    path('add/adduser/',views.adduser, name='Add User'),

]
