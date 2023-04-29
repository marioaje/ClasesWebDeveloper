from django.http import HttpResponse
from django.template import loader

def index(request):
  templates = loader.get_template('plantilla.html')
  return HttpResponse(templates.render())