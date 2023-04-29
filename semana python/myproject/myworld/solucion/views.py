from re import template
from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader #nueva linea

# Create your views here.

def index(request):
    # return HttpResponse("<h1>Clase Lunes 02 Mayo 2022</h1>")
    template = loader.get_template('planta.html')
    return HttpResponse(template.render())