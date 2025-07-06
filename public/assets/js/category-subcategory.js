document.addEventListener('DOMContentLoaded', function () {
    const subcategoryColumn = document.querySelector('.subcategory-column');
    const subcategoriesList = document.getElementById('subcategories-list');
    const addSubcategoryBtn = document.getElementById('add-subcategory');

    // هذا التعريف الصح
    window.toggleSubcategories = function (categoryId) {
        if (
            subcategoryColumn.style.display === "block" &&
            subcategoryColumn.dataset.categoryId === categoryId.toString()
        ) {
            subcategoryColumn.style.display = "none";
            return;
        }

        subcategoryColumn.style.display = "block";
        subcategoryColumn.dataset.categoryId = categoryId;

    fetch(`/admin/categories/${categoryId}/subcategories`)
    .then(response => response.json())
    .then(data => {
        console.log(data); // تحقق من البيانات المستلمة
        subcategoriesList.innerHTML = '';
        data.subcategories.forEach(subcategory => {
            const subcategoryDiv = document.createElement('div');
            subcategoryDiv.classList.add('subcategory-item');
            subcategoryDiv.innerHTML = `
                <span>${subcategory.name}</span>
                <div class="action-buttons">
                    <a href="/admin/categories/${categoryId}/subcategories/${subcategory.id}/edit">Edit</a>
                    <a href="#" onclick="deleteSubcategory(${subcategory.id})">Delete</a>
                </div>
            `;
            subcategoriesList.appendChild(subcategoryDiv);
        });

        if (addSubcategoryBtn) {
            addSubcategoryBtn.style.display = "inline-block";
        }
    })
    .catch(() => {
        subcategoriesList.innerHTML = '<p style="color:red;">Error loading subcategories.</p>';
    });

    };

    window.deleteSubcategory = function (subcategoryId) {
        if (!confirm('Are you sure you want to delete this subcategory?')) return;

        fetch(`/sub/delete/${subcategoryId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Delete failed');
            return response.json();
        })
        .then(() => {
            alert('Deleted successfully');
            toggleSubcategories(parseInt(subcategoryColumn.dataset.categoryId));
        })
        .catch(() => alert('An error occurred'));
    };

    if (addSubcategoryBtn) {
        addSubcategoryBtn.addEventListener('click', function () {
            const categoryId = subcategoryColumn.dataset.categoryId;
            if (categoryId) {
                window.location.href = `/admin/categories/${categoryId}/subcategories/create`;
            }
        });
    }
});
