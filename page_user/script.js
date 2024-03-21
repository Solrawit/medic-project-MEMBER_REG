const fileSelector = document.querySelector('input[type="file"]');
const start = document.querySelector('button');
const img = document.querySelector('img');
const progress = document.querySelector('.progress');
const textarea = document.querySelector('textarea');

// แสดงรูปที่อัปโหลด
fileSelector.onchange = () => {
    const file = fileSelector.files[0];
    const imgUrl = window.URL.createObjectURL(file);
    img.src = imgUrl;
};

// เริ่มการยอมรับข้อความ
start.onclick = () => {
    textarea.innerHTML = '';
    progress.innerHTML = 'Recognizing text...';

    Tesseract.recognize(
        fileSelector.files[0],
        'eng+tha',
        { logger: m => console.log(m) }
    ).then(({ data: { text } }) => {
        // ลบช่องว่างที่เกินออกจากข้อความ
        const cleanedText = text.replace(/\s+/g, ''); // ใช้ regular expression เพื่อลบช่องว่างทั้งหมด
        textarea.innerHTML = cleanedText;
        progress.innerHTML = 'Done';
    }).catch(err => {
        console.error('Error during recognition:', err);
        progress.innerHTML = 'Error during recognition';
    });
};

