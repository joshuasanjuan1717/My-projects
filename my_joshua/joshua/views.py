from cmath import cos
from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from joshua.models import Items, Register

# Create your views here.
def home(request):
    
    if request.method == 'POST':
        #item = request.POST.get('item')
        #cost = request.POST.get('cost')
        saveItem = Items()
        saveItem.item = request.POST.get('item')
        saveItem.cost = request.POST.get('cost')
        saveItem.save()

        #objects = Items.objects.all()
        #errors = 'sample text error'

        #return render(request, 'myItems.html', {'Items': objects, 'Error': errors})
        #return myItems(request)
        return HttpResponseRedirect('myItems')
    else:
        return render(request, 'home.html')
    #return HttpResponse('this is home')


def register(request):
    
    if request.method == 'POST':
        register = Register()
        register.username = request.POST.get('username')
        register.password = request.POST.get('password')
        register.save()

        return render(request, 'register.html')
    else:
        return render(request, 'register.html')


def myItems(request):
    objects = Items.objects.all()
    errors = 'sample text error'

    return render(request, 'myItems.html', {'Items': objects, 'Error': errors})


def item(request, my_id, my_str):
    sample = my_id
    sample2 = my_str

    return render(request, 'item.html', {'Sample': sample, 'Sample2': sample2})



def delete(request, my_id):
    object = Items.objects.get(id = my_id)
    object.delete()

    return HttpResponseRedirect('../myItems')


def update(request, my_id):
    object = Items.objects.get(id = my_id)
    if request.method == 'POST':
        if 'update00' in request.POST:
        
            object.item = request.POST.get('item')
            object.cost = request.POST.get('cost')
            object.save()

            return HttpResponseRedirect('../myItems')
    else:
        return render(request, 'update.html', {'Object': object})

    






