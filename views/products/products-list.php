<h2> Список товаров</h2>

<a href="/../../product-add.php" class="btn btn-success">Добавить товар</a>

<?php if(empty($data["productsList"])):?>
    <div class="text-center">
        <b>Нет данных для отображения</b>
    </div>
<?php else:?>
    <table class="table table-bordered table-striped" id="products">
        <thead>
            <tr>
                <td>#</td>
                <td>Название товара:</td>
                <td>Изображение:</td>
                <td>Дата добавления:</td>
                <td>Кто добавил:</td>
                <td>Количество отзывов:</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data["productsList"] as $product):?>
                <tr>
                    <td><?=$product->Id;?></td>
                    <td><a href="/product-review.php?product-id=<?=(int)$product->Id?>"><?=$product->Name;?></a></td>
                    <td><img src="<?=$product->ImageUrl;?>" alt="<?=$product->Name;?>" width="100"></td>
                    <td><?=$product->CreateDate;?></td>
                    <td><?=$product->Author;?></td>
                    <td><?=$product->ReviewsCount;?></td>
                </tr>
            <?php endforeach;?>
        <tbody>
    </table>
<?php endif;?>