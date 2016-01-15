/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Model;
using Core.Database.Tables;

namespace Game.Network.ServerPacket
{
    public class PROTOCOL_CLAN_LIST_ACK : SendPacket
    {
        private List<Clan> list = (List<Clan>)null;

        public PROTOCOL_CLAN_LIST_ACK(List<Clan> list)
        {
            this.list = list;
        }

        public override void WriteImpl()
        {

            WriteH(0x5A6);
            WriteD(0);
            foreach (Clan clan in list)
            {
                WriteC(0xAA);//unk
                WriteD((int)clan.Id);//id
                WriteS(clan.Name, Clan.CLAN_NAME_SIZE);//clan name
                WriteC((byte)clan.Rank);
                WriteC((byte)clan.PlayersCount);//кол-во участников
                WriteC((byte)clan.MaxPlayersCount);//максимально игроков в клане
                WriteD(clan.DateCreated);//дата создания клана
                WriteB(new byte[4] { 0x01, 0x08, 0x1e, 0x1a }); //остальные параметры наверное 
            }
        }
    }
}
