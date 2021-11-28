  function validate (form)
  {
  	if((form.value>=5)&&(form.value<=10))
    {
      alert("Благодарим за высокую оценку!");
    }
    if(form.value>10)
    {
      alert("Введите число от 0 до 10!");
    }
    if(form.value<=0)
    {
      alert("Введите корректное число!");
    }
      if((form.value>0)&&(form.value<5))
      {
        alert("Спасибо за ваш отзыв");
      }
    }
