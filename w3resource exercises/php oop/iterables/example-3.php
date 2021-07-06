
PHP OOP
PHP OOP nima?
PHP sinflari / ob'ektlari
PHP konstruktori
PHP destruktori
PHP-ga kirish modifikatorlari
PHP merosi
PHP doimiylari
PHP abstrakt darslari
PHP interfeyslari
PHP xususiyatlari
PHPning statik usullari
PHP-ning statik xususiyatlari
PHP ism maydonlari
PHP o'zgaruvchilari

MySQL ma'lumotlar bazasi
MySQL ma'lumotlar bazasi
MySQL ulanish
MySQL yaratish JB
MySQL-jadval yaratish
MySQL ma'lumotlarini qo'shish
MySQL-ning oxirgi identifikatorini oling
MySQL-ni qo'shish
MySQL tayyorlangan
MySQL-ni tanlang
MySQL qaerda
MySQL-ga buyurtma berish
Ma'lumotlarni o'chirish MySQL
MySQL-ni yangilash ma'lumotlari
MySQL-ning cheklangan ma'lumotlari

PHP XML
PHP XML tahlilchilari
PHP SimpleXML tahlilchisi
PHP SimpleXML - oling
PHP XML Expat
PHP XML DOM

PHP - AJAX
AJAX kirish
AJAX PHP
AJAX ma'lumotlar bazasi
AJAX XML
AJAX jonli qidiruvi
AJAX so'rovi

PHP misollari
PHP misollari
PHP kompilyatori
PHP Viktorinasi
PHP mashqlari
PHP sertifikati

PHP ma'lumotnomasi
PHP-ga umumiy nuqtai
PHP qatori
PHP taqvimi
PHP sanasi
PHP katalogi
PHP xatosi
PHP istisnosi
PHP fayllar tizimi
PHP filtri
PHP FTP
PHP JSON
PHP kalit so'zlari
PHP Libxml
PHP-pochta
PHP matematikasi
PHP boshq
PHP MySQLi
PHP tarmog'i
PHP chiqishini boshqarish
PHP RegEx
PHP SimpleXML
PHP oqimi
PHP satri
PHP o'zgaruvchisi bilan ishlash
PHP XML tahlilchisi
PHP Zip
PHP vaqt zonalari



PHP o'zgaruvchilari
PHP - o'zgaruvchan nima?
Takrorlanadigan narsa - bu foreach()loop orqali o'tadigan har qanday qiymat .

iterablePsevdo-turi PHP 7.1 joriy etildi va u vazifani mustaqil o'zgaruvchilar va vazifasi Qaytish qadriyatlar uchun ma'lumotlar turi sifatida foydalanish mumkin.

PHP - O'zgaruvchanlardan foydalanish
iterableKalit so'z bir vazifani argument bir ma'lumotlar turi sifatida yoki funktsiya Qaytish turi sifatida foydalanish mumkin:

Misol
Takrorlanadigan funktsiya argumentidan foydalaning:

<?php
function printIterable(iterable $myIterable) {
  foreach($myIterable as $item) {
    echo $item;
  }
}

$arr = ["a", "b", "c"];
printIterable($arr);
?>
Misol
Takrorlanadigan narsani qaytaring:

<?php
function getIterable():iterable {
  return ["a", "b", "c"];
}

$myIterable = getIterable();
foreach($myIterable as $item) {
  echo $item;
}
?>
ADVERTISEMENT	
PHP - O'zgaruvchanlarni yaratish
Massivlar

Barcha massivlar takrorlanuvchi narsadir, shuning uchun har qanday massiv takrorlanuvchanlikni talab qiladigan funktsiya argumenti sifatida ishlatilishi mumkin.

Iteratorlar

IteratorInterfeysni amalga oshiradigan har qanday ob'ekt, takrorlanuvchanlikni talab qiladigan funktsiya argumenti sifatida ishlatilishi mumkin.

Takrorlovchi elementlarning ro'yxatini o'z ichiga oladi va ularni ko'rib chiqish usullarini taqdim etadi. U ro'yxatdagi elementlardan biriga ko'rsatgichni saqlaydi. Ro'yxatdagi har bir elementda kalit bo'lishi kerak, undan elementni topish uchun foydalanish mumkin.

Takrorlovchi quyidagi usullarga ega bo'lishi kerak:

current()- Pointer hozir ko'rsatayotgan elementni qaytaradi. Har qanday ma'lumot turi bo'lishi mumkin
key()Ro'yxatdagi joriy element bilan bog'liq kalitni qaytaradi. Bu faqat tamsayı, float, boolean yoki string bo'lishi mumkin
next() Ko'rsatkichni ro'yxatdagi keyingi elementga o'tkazadi
rewind() Ko'rsatkichni ro'yxatdagi birinchi elementga o'tkazadi
valid()Agar ichki ko'rsatkich biron bir elementga ishora qilmasa (masalan, agar ro'yxat oxirida next () chaqirilgan bo'lsa), bu false qiymatiga qaytishi kerak. Boshqa har qanday holatda ham haqiqiy bo'ladi
Misol
Iterator interfeysini amalga oshiring va uni takrorlanadigan sifatida ishlating:

<?php
// Create an Iterator
class MyIterator implements Iterator {
  private $items = [];
  private $pointer = 0;

  public function __construct($items) {
    // array_values() makes sure that the keys are numbers
    $this->items = array_values($items);
  }

  public function current() {
    return $this->items[$this->pointer];
  }

  public function key() {
    return $this->pointer;
  }

  public function next() {
    $this->pointer++;
  }

  public function rewind() {
    $this->pointer = 0;
  }

  public function valid() {
    // count() indicates how many items are in the list
    return $this->pointer < count($this->items);
  }
}

// A function that uses iterables
function printIterable(iterable $myIterable) {
  foreach($myIterable as $item) {
    echo $item;
  }
}

// Use the iterator as an iterable
$iterator = new MyIterator(["a", "b", "c"]);
printIterable($iterator);
?>