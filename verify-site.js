const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();
  
  await page.setViewportSize({ width: 1920, height: 1080 });
  
  try {
    console.log('Loading http://localhost:8082...');
    
    // Clear cache and cookies
    await page.context().clearCookies();
    
    await page.goto('http://localhost:8082', { 
      waitUntil: 'networkidle', 
      timeout: 30000 
    });
    
    // Wait a bit more for any slow-loading elements
    await page.waitForTimeout(3000);
    
    console.log('Page loaded, taking screenshot...');
    await page.screenshot({ 
      path: 'current-site-verification.png', 
      fullPage: true 
    });
    
    // Check page title
    const title = await page.title();
    console.log('Page title:', title);
    
    // Check if this looks like a law firm site
    const heroSection = await page.$('.hero-section');
    const practiceAreas = await page.$('.practice-areas-section');
    const siteHeader = await page.$('.site-header');
    
    console.log('Hero section found:', !!heroSection);
    console.log('Practice areas found:', !!practiceAreas);
    console.log('Site header found:', !!siteHeader);
    
    // Get some text content to verify
    const bodyText = await page.textContent('body');
    const hasLawFirmContent = bodyText.includes('법률사무소') || bodyText.includes('law-firm');
    console.log('Contains law firm content:', hasLawFirmContent);
    
    console.log('Screenshot saved as current-site-verification.png');
    
  } catch (error) {
    console.error('Error:', error.message);
  }
  
  await browser.close();
})();