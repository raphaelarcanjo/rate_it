window.onload = () => {
    document.querySelectorAll('div.rating input').forEach(el => {
        el.onchange = (e) => {
            let name = e.target.getAttribute('name')
            let value = e.target.value
            fetch('teste', {
                    method: 'PUT',
                    headers: new Headers({
                        'Content-Type': 'application/json;charset=utf-8'
                    }),
                    body: JSON.stringify({ name, value })
                })
                .then(response => {
                    if (!response.ok) {
                        console.error(`error: url not found; status: ${response.status}`)
                    } else response.json()
                })
                .then(data => console.log(data))
        }
    })
}