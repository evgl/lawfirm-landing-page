const playwright = require('playwright');

async function testCompletePage() {
    const browser = await playwright.chromium.launch({ headless: false });
    const page = await browser.newPage();
    
    try {
        console.log('Testing complete page with footer...');
        
        // Navigate to the law firm website
        await page.goto('http://localhost:8082', { waitUntil: 'networkidle' });
        
        // Wait for page to fully load
        await page.waitForTimeout(3000);
        
        // Check if footer is visible
        const footer = await page.$('.site-footer');
        if (footer) {
            console.log('✅ Footer found and visible');
            
            // Check footer sections
            const consultationCTA = await page.$('.consultation-cta');
            const footerMain = await page.$('.footer-main');
            const footerBottom = await page.$('.footer-bottom');
            
            console.log('✅ Consultation CTA:', consultationCTA ? 'Found' : 'Missing');
            console.log('✅ Footer Main:', footerMain ? 'Found' : 'Missing');
            console.log('✅ Footer Bottom:', footerBottom ? 'Found' : 'Missing');
        } else {
            console.log('❌ Footer not found');
        }
        
        // Take screenshot of complete page
        await page.screenshot({ 
            path: 'complete-page-with-footer.png', 
            fullPage: true 
        });
        console.log('📸 Complete page screenshot saved as: complete-page-with-footer.png');
        
        // Scroll to bottom to check footer visibility
        await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight));
        await page.waitForTimeout(1000);
        
        await page.screenshot({ 
            path: 'footer-section.png', 
            clip: { x: 0, y: 0, width: 1200, height: 800 }
        });
        console.log('📸 Footer section screenshot saved as: footer-section.png');
        
    } catch (error) {
        console.error('Error testing page:', error);
    } finally {
        await browser.close();
    }
}

testCompletePage();