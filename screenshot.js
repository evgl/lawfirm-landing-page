const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();
  
  // Set viewport for desktop view
  await page.setViewportSize({ width: 1920, height: 1080 });
  
  try {
    console.log('Navigating to http://localhost:8082...');
    await page.goto('http://localhost:8082', { waitUntil: 'networkidle', timeout: 30000 });
    
    console.log('Taking screenshot...');
    await page.screenshot({ 
      path: 'website-screenshot.png', 
      fullPage: true 
    });
    
    console.log('Screenshot saved as website-screenshot.png');
    
    // Also check if the menu is functional
    const menuToggle = await page.$('.mobile-menu-toggle');
    if (menuToggle) {
      console.log('Mobile menu toggle found');
    }
    
    const mainNav = await page.$('.main-navigation');
    if (mainNav) {
      console.log('Main navigation found');
    }
    
    const quickMenu = await page.$('.quick-menu');
    if (quickMenu) {
      console.log('Quick menu found');
    }
    
  } catch (error) {
    console.error('Error:', error.message);
  }
  
  await browser.close();
})();