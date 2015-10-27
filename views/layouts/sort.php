<!--
<ul class="options-list">
    <li>Вид</li>
    <li>Сортировка</li>
    <li><a class="select-sort">Без сортировки</a>
    <ul class="sorting-list">
        <li><a href="">От дорогих к дешевым</a></li>
        <li><a href="">От дешевых к дорогим</a></li>
        <li><a href="">От дешевых к дорогим</a></li>
        <li><a href="">По рейтингу</a></li>
        <li><a href="">По популярности</a></li>
    </ul>
    </li>
</ul>
-->
<div id="block-sort">
    <form method="post" id="form-price-sort" action="">
        <div id="block-input-price">
            <p>от</p>
            <input type="text" id="from-price" name="from-price">
            <p>до</p>
            <input type="text" id="before-price" name="before-price">
            <p>грн.</p>
            <div id="sort-price"></div>
            <button type="submit" name="price" class="btn btn-success sort-price">Ok</button>
        </div>
    </form>

    <form method="GET" id="form-genry-sort" action="">
        <p class="lead">Жанры</p>
        <div class="list-group">
            <ul id="checkbox-category">
                <li><input type="checkbox" id="check1"><label for="check1">Action</label></li>
                <li><input type="checkbox" id="check2"><label for="check2">Rpg</label></li>
                <li><input type="checkbox" id="check3"><label for="check3">Стратегии</label></li>
                <li><input type="checkbox" id="check4"><label for="check4">Приключения</label></li>
            </ul>
            <button type="submit" name="genry" class="btn btn-success sort-genry">Ok</button>
        </div>
    </form>
</div>



