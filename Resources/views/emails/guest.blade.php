<html>
<body>
<p>Sayın {{ $application->present()->fullname }}</p>
<p>Başvuru formunuz tarafımıza ulaşmıştır. En kısa zamanda incelenerek geri dönüş yapılacaktır. İlginize teşekkür ederiz.</p>
<hr>
<p>{{ setting('theme::company-name') }}</p>
<p>{{ setting('theme::address') }}</p>
<p>{{ setting('theme::phone') }}</p>
<p>{{ setting('theme::email') }}</p>
</body>
</html>