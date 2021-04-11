<h2>Отзывы о товаре: <?=$data["product"]->Name;?></h2>

<div class="col-sm-12 text-center">
    <img src="<?=$data["product"]->ImageUrl;?>" alt="<?=$data["product"]->Name;?>" width="100%">
</div>

<div class="col-sm-12">
    <p>Средняя оценка товара: <?=$data["product"]->ReviewsAVG;?></p>
</div>

<div class="col-sm-12">
    <h2>Добавить отзыв</h2>
    <form action="/../../product-review.php?product-id=<?=$data["product"]->Id;?>"  method="post">
        <input type="hidden" name="productid"  value="<?=$data["product"]->Id;?>">
        <div class="input-group">
            <label>Ваше имя:</label>
            <input type="text" name="name"  class="form-control" placeholder="Ваше имя:" required>
        </div>
        <div class="input-group">
            <label>Рейтинг:</label>
            <select name="rating" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="input-group">
            <label>Отзыв:</label>
            <textarea name="review" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-success" value="Написать">
    </form>
</div>

<?php if(!empty($data["reviews"])):?>
    <table class="table table-bordered table-striped">
        <tr>
            <td>Пользователь:</td>
            <td>Рейтинг:</td>
            <td>Отзыв:</td>
            <td>Дата:</td>
        </tr>
        <?php foreach($data["reviews"] as $review):?>
            <tr>
                <td><?=$review->Name;?></td>
                <td><?=$review->Rating;?></td>
                <td><?=$review->Review;?></td>
                <td><?=$review->CreateDate;?></td>
            </tr>
        <?php endforeach;?>
    </table>
<?php else:?>
    <div class="text-center">
        <h3>Отзывов нет</h3>
    </div>
<?php endif;?>
