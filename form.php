<form action="vendor/send_feedback.php" method="post">
    <fieldset>
        <legend>Форма обратной связи</legend>
        Имя*:<br>
        <input type="text" name="name" placeholder="Как к Вам обращаться" minlength="3" required><br>
        Email*:<br>
        <input type="email" name="email" placeholder="E-Mail [name@host.ru]" required>
        <span class="form__message">Это поле должно содержать E-Mail в формате example@host.ru</span><br>
        Текст сообщения*:<br>
        <textarea rows="7" data-field="item" name="message" placeholder="Введите Ваше обращение" minlength="12" required></textarea>
        <p data-field="counter"></p><br>
        <button type="reset" class="reset">&#8855; Очистить</button>
        <button type="submit" >Отправить</button>
    </fieldset>
</form>
<!--    скрипт подсчёта количества вводимых символов в textarea-->
<script>
    $(function () {
	var target = $('[data-field="counter"]');

	$(document).on('textarea', '[data-field="item"]', function () {
		var item = $(this);
		target.html('Набрано: ' + item.val().length + ' символов');
	});
});
</script>