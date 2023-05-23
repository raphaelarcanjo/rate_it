from django.shortcuts import render, redirect
from django.contrib import messages
from app.models.Message import Message


class Contact:
    def __init__(self):
        self.data = {
            'title': 'Contact',
            }

    def index(self, request):
        return render(request, 'contact.html', self.data)

    def message(self, request):
        if request.method == 'POST':
            for name, value in request.POST.items():
                if name != 'csrfmiddlewaretoken' and not value:
                    messages.error(request, f"The field '{name.capitalize()}' is empty or not valid!")
                    return redirect('contact')

            contact = Message(
                name = request.POST.get('name'),
                email = request.POST.get('email'),
                subject = request.POST.get('subject'),
                message = request.POST.get('message'),
                )
            
            contact.save()

            if contact.id:
                messages.success(request, "Your message was sent successfuly!")
            else:
                messages.error(request, "Error sendig your message!")

            return redirect('contact')
        else:
            return redirect('contact')