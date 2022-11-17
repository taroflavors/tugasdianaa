function hapusMenu(url){
    swal.fire({
        title: 'are you sure?',
        text: "yakin ingin hapus menu?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtoncolor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    })
}

function hapusRole(url){
    swal.fire({
        title: 'are you sure?',
        text: "yakin ingin hapus role?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtoncolor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    })
}

function hapuSubmenu(url){
    swal.fire({
        title: 'are you sure?',
        text: "yakin ingin hapus submenu?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtoncolor: '#d33',
        confirmButtonText: 'ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = url;
        }
    })
}