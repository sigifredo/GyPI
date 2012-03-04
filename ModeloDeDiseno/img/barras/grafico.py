#!/usr/bin/env python
# a bar plot with errorbars
import numpy as np
import matplotlib.pyplot as plt

N = 4
menMeans = (100, 50, 10, 0)
menStd =   (0, 0, 0, 0)

ind = np.arange(N)  # the x locations for the groups
width = 0.35       # the width of the bars

fig = plt.figure()
ax = fig.add_subplot(111)
rects1 = ax.bar(ind, menMeans, width, color='g', yerr=menStd)

# add some
ax.set_ylabel('Porcentaje')
ax.set_title('Defectos encontrados')
ax.set_xticks(ind+width)
ax.set_xticklabels( ('Modelo de negocio', 'Modelo de requisitos', "Modelo de diseno", "Imlementacion") )

def autolabel(rects):
    # attach some text labels
    for rect in rects:
        height = rect.get_height()
        ax.text(rect.get_x()+rect.get_width()/2., 1.05*height, '%d'%int(height),
                ha='center', va='bottom')

autolabel(rects1)

plt.show()
