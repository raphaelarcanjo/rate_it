from django.shortcuts import render


class About:
    def index(self, request):
        data = {
            'title': 'About'
        }

        return render(request, 'about.html', data)