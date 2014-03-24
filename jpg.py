from PIL import Image;
from ROOT import TH1D, TH2D, TFile;

resize_factor = 0.2;
im = Image.open('black.jpg');
width = im.size[0];
height = im.size[1];

'''
# resize for large picture
resize_factor = 0.2;
width_new = int(resize_factor*width);
height_new = int(resize_factor*height);
im = im.resize((width_new, height_new), Image.ANTIALIAS);
width = im.size[0];
height = im.size[1];
'''

hin1r = TH1D('hin1r', 'hin1r', 256, 0, 256);
hin1g = TH1D('hin1g', 'hin1g', 256, 0, 256);
hin1b = TH1D('hin1b', 'hin1b', 256, 0, 256);
hin1t = TH1D('hin1t', 'hin1t', 256, 0, 256);
hin2r = TH2D('hin2r', 'hin2r', width, 0, width, height, 0, height);
hin2g = TH2D('hin2g', 'hin2g', width, 0, width, height, 0, height);
hin2b = TH2D('hin2b', 'hin2b', width, 0, width, height, 0, height);
hin2t = TH2D('hin2t', 'hin2t', width, 0, width, height, 0, height);
pixel = 0;
for i in range(width):
  for j in range(height):
    red = im.getpixel((i,j))[0];
    green = im.getpixel((i,j))[1];
    blue = im.getpixel((i,j))[2];
    value = 0.299*red + 0.587*green + 0.114*blue;
    pixel = pixel + 1;

    hin1r.Fill(red);
    hin1g.Fill(green);
    hin1b.Fill(blue);
    hin1t.Fill(value);
    hin2r.SetBinContent(i+1, height-1-j, red);
    hin2g.SetBinContent(i+1, height-1-j, green);
    hin2b.SetBinContent(i+1, height-1-j, blue);
    hin2t.SetBinContent(i+1, height-1-j, value);

output = TFile('result.root', 'RECREATE');
output.cd();
hin1r.Write();
hin1g.Write();
hin1b.Write();
hin1t.Write();
hin2r.Write();
hin2g.Write();
hin2b.Write();
hin2t.Write();
output.Write();
output.Save();
