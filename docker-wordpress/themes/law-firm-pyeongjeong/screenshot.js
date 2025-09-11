const puppeteer = require('puppeteer');

(async () => {
  const browser = await puppeteer.launch({ headless: true });
  const page = await browser.newPage();
  
  await page.setViewport({ width: 1200, height: 800 });
  await page.goto('http://localhost:8082', { waitUntil: 'networkidle2' });
  
  // Scroll to bottom to see footer
  await page.evaluate(() => {
    window.scrollTo(0, document.body.scrollHeight);
  });
  
  await page.waitForTimeout(2000);
  
  await page.screenshot({ 
    path: 'footer-screenshot.png',
    fullPage: true 
  });
  
  await browser.close();
  console.log('Screenshot saved as footer-screenshot.png');
})();