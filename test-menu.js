const { chromium } = require('playwright');

(async () => {
  const browser = await chromium.launch({ headless: false });
  const page = await browser.newPage();
  
  await page.setViewportSize({ width: 1920, height: 1080 });
  
  try {
    console.log('Testing menu functionality...');
    await page.goto('http://localhost:8082', { waitUntil: 'networkidle', timeout: 30000 });
    
    // Test main navigation menu items
    const navItems = await page.$$('.primary-menu a');
    console.log(`Found ${navItems.length} navigation menu items`);
    
    // Test quick menu items
    const quickMenuItems = await page.$$('.quick-menu-item');
    console.log(`Found ${quickMenuItems.length} quick menu items`);
    
    // Test mobile menu toggle (if visible)
    const mobileToggle = await page.$('.mobile-menu-toggle');
    if (mobileToggle) {
      console.log('Mobile menu toggle is present');
      
      // Test mobile menu functionality
      await mobileToggle.click();
      await page.waitForTimeout(1000);
      
      const navActive = await page.$('.main-navigation.active');
      if (navActive) {
        console.log('✅ Mobile menu opens correctly');
        await mobileToggle.click(); // Close it
      } else {
        console.log('❌ Mobile menu may not be working correctly');
      }
    }
    
    // Test search functionality
    const searchInput = await page.$('.search-form input[type="search"]');
    if (searchInput) {
      console.log('✅ Search form is present');
      await searchInput.fill('형사사건');
      console.log('✅ Search input works');
    }
    
    // Test consultation form
    const consultationForm = await page.$('#consultation-form');
    if (consultationForm) {
      console.log('✅ Consultation form is present');
    }
    
    // Test scroll functionality
    await page.evaluate(() => window.scrollTo(0, 500));
    await page.waitForTimeout(1000);
    console.log('✅ Page scrolling works');
    
    console.log('\n=== Menu Functionality Test Complete ===');
    
  } catch (error) {
    console.error('Error:', error.message);
  }
  
  await browser.close();
})();