from django.shortcuts import render


class Contact:
    def index(self, request):
        data = {
            'title': 'Contact'
        }

        return render(request, 'contact.html', data)

    def message(self, request):
        pass