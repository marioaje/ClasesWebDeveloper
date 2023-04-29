from re import template
from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from django.template import loader #nueva linea
from django.urls import reverse
from .models import Dashboard

# Create your views here.

def index(request):
    dashboard =  Dashboard.objects.all().values()
    #output = ""
    # for x in dashboard:
    #     output += "<h1>" + x['firtsname'] + " " + x['lastname'] + "</h1><br>"
    # return HttpResponse(output)   
    # return HttpResponse("<h1>Clase Lunes 02 Mayo 2022</h1>")
    template = loader.get_template('plantillas.html')
    context = {
        'mydashboard':dashboard,
    }
    return HttpResponse(template.render(context, request))
    #HttpResponse(template.render())

def add(request):    
    template = loader.get_template('add.html')
    return HttpResponse( template.render({}, request) )

def adduser(request):
    Firtsname = request.POST['firtsname']
    Lastname= request.POST['lastname']

    dashboard = Dashboard ( firtsname=Firtsname, lastname=Lastname )
    dashboard.save()

    #return HttpResponse(template.render(context, request))
    return HttpResponseRedirect('/dashboard/')
    #index(request)
    