//
//  ColoursTests.m
//  ColoursTests
//
//  Created by Abizer Nasir on 28/10/2013.
//
//

@import XCTest;
#import "UIColor+Crayola.h"

// Expose Private methods for UIColor+Crayola

@interface UIColor (CrayolaTests)

+ (NSString *)cacheKeyWithRed:(CGFloat)red green:(CGFloat)green blue:(CGFloat)blue;

@end

@interface ColoursTests : XCTestCase

@end

@implementation ColoursTests

- (void) testCacheNameCreation {
    XCTAssertEqualObjects(@"0.200.200.20", [UIColor cacheKeyWithRed:0.2 green:0.2 blue:0.2], @"Should have correctly generated key");
}

- (void) testStaticGeneration {
    UIColor *testColour = [UIColor crayolaAbsoluteZeroColor];
    UIColor *testColour2 = [UIColor crayolaAbsoluteZeroColor];

    XCTAssertTrue(testColour == testColour2, @"Should be the same objects");
}

@end
