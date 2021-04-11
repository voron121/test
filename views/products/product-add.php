<h2>Добавить товар</h2>
<form action="/../../product-add.php"" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <label>Название товара:</label>
        <input type="text" name="name"  class="form-control" placeholder="Название товара" required>
    </div>
    <div class="input-group">
        <label>Средняя цена:</label>
        <input type="text" name="avgPrice" class="form-control" number" step="0.01" placeholder="Средняя цена" required>
    </div>
    <div class="input-group">
        <label>Ссылка на изображение:</label>
        <input type="text" name="ImageUrl" class="form-control" placeholder="Ссылка на изображение" required>
    </div>
    <div class="input-group">
        <label>Кто добавил:</label>
        <input type="text" name="author"  class="form-control"placeholder="Кто добавил" required>
    </div>
    <input type="submit" class="btn btn-success" value="Создать">
</form>