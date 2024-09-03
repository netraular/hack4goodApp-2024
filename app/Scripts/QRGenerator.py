"""_summary_
"""

import sys
import segno
import cv2
import os


def qr_generate():
    """_summary_
    """
    os.makedirs('qr', exist_ok=True)
    
    qrcode = segno.make_qr(f"https://eco2.netshiba.com/viewqr?id={sys.argv[1]}")
    qrcode.save(f"qr/qr_{sys.argv[1]}.png", scale=10)
    print(sys.argv[1])
    
    
    
def qr_read():
    """_summary_
    """
    img = cv2.imread('qr_read.jpeg')
    qcd = cv2.QRCodeDetector()
    
    retval, decoded_info, points, straight_qrcode = qcd.detectAndDecodeMulti(img)
    print(points)


def main():
    """_summary_
    hola
    """
    qr_generate()


if __name__ == "__main__":
    main()