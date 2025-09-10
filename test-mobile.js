const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();
  
  // Set mobile viewport
  await page.setViewportSize({ width: 375, height: 667 });
  
  try {
    console.log('Testing mobile functionality...');
    await page.goto('http://localhost:8082', { waitUntil: 'networkidle', timeout: 30000 });
    
    // Take mobile screenshot
    await page.screenshot({ 
      path: 'mobile-screenshot.png', 
      fullPage: true 
    });
    console.log('Mobile screenshot saved as mobile-screenshot.png');
    
    // Test mobile menu toggle
    const mobileToggle = await page.$('.mobile-menu-toggle');
    if (mobileToggle) {
      const isVisible = await mobileToggle.isVisible();
      if (isVisible) {
        console.log('✅ Mobile menu toggle is visible on mobile');
        
        // Test clicking the mobile menu
        await mobileToggle.click();
        await page.waitForTimeout(1000);
        
        const navActive = await page.$('.main-navigation.active');
        if (navActive) {
          console.log('✅ Mobile menu opens correctly');
        } else {
          console.log('❌ Mobile menu did not activate');
        }
      } else {
        console.log('❌ Mobile menu toggle not visible on mobile');
      }
    } else {
      console.log('❌ Mobile menu toggle not found');
    }
    
    // Test quick menu on mobile
    const quickMenu = await page.$('.quick-menu');
    if (quickMenu) {
      const isVisible = await quickMenu.isVisible();
      console.log(`Quick menu visible on mobile: ${isVisible ? '✅' : '❌'}`);
    }
    
    console.log('\n=== Mobile Test Complete ===');
    
  } catch (error) {
    console.error('Error:', error.message);
  }
  
  await browser.close();
})();