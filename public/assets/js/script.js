document.getElementById('categoryFilter').addEventListener('change', function () {
    const selectedCategory = this.value;
    // if(selectedCategory === 'pilih-kategori'){
    //     console.log('benar');
    // }
    const bookList = document.getElementById('bookList');
    Array.from(bookList.children).forEach(book => {
        if (selectedCategory === 'All' || selectedCategory === 'pilih-kategori' || book.dataset.category === selectedCategory) {
            book.classList.remove('hidden')
        } else if(selectedCategory !== 'All' || selectedCategory === 'pilih-kategori' || book.dataset.category !== selectedCategory) {
            book.classList.add('hidden')
        }
    });
});
